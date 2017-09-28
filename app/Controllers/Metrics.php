<?php

/**
 *  _    _ _____   _______
 * | |  | |_   _| |__   __|
 * | |  | | | |  ___ | |
 * | |  | | | | / _ \| |
 * | |__| |_| || (_)|| |
 * \_____/|____\____/|_|.
 *
 * @author Universal Internet of Things
 * @license Apache 2 <https://opensource.org/licenses/Apache-2.0>
 * @copyright University of Brasília
 */

namespace App\Controllers;

use App\Models\Response\Chart;
use Koine\QueryBuilder\Statements\Select;

/**
 * Class Metrics.
 *
 * A Controller that Manages all Routes and Business Logic
 *  from the Metrics Resources
 *
 * @version 2.0.0
 *
 * @since 2.0.0
 */
class Metrics extends Controller
{
    /**
     * Index Page.
     *
     * Show a Welcoming Page
     */
    public function welcome()
    {
        response()::type('text/html');

        blade()::make('header.welcome');
        blade()::make('body.menu');
        blade()::make('body.welcome');
        blade()::make('footer.welcome');
        blade()::make('footer.page-footer');
    }

    /**
     * List Page.
     *
     * Show a View containing a Dashboard with
     * Clients, Logs, and more
     */
    public function home()
    {
        response()::type('text/html');

        $clients = database()->select('client', (new Select())->where('-clientTime < 0')
            ->orderBy('-clientTime asc'));

        $logs = database()->select('log', (new Select())->where('-serverTime < 0')
            ->orderBy('-serverTime asc')->limit(100));
        $data = database()->select('data', (new Select())->where('-clientTime < 0')
            ->orderBy('-clientTime asc')->limit(1))[0];

        $service = !empty($data) && $data->document !== null ? database()->select('service',
            $data->document->serviceId) : [];

        blade()::make('header.home');
        blade()::make('body.menu');
        blade()::make('body.home', ['clients' => $clients, 'logs' => $logs, 'data' => $data, 'service' => $service]);
        blade()::make('footer.home');
        blade()::make('footer.page-footer');
    }

    /**
     * Client Page.
     *
     * Show a Specific Client
     *
     * @param string $id The client to be hooked
     */
    public function client(string $id)
    {
        response()::type('text/html');

        $client = database()->select('client', $id);
        $client->id = $id;
        $client->location = (array)explode(':', $client->location);
        $client->token = database()->select('token', (new Select())->where('clientId', $id))[0]->document;

        $services = database()->select('service', (new Select())->where('clientId', $id)
            ->where('-clientTime < 0')->orderBy('-clientTime asc'));

        $data = array_map(function ($service) {
            return json()::map(new Chart(), [
                'label' => $service->document->name,
                'data' => database()->select('data', (new Select())->where('serviceId',
                    $service->id)->where('-clientTime < 0')->orderBy('-clientTime asc')->limit(100)),
            ]);
        }, $services);

        blade()::make('header.client');
        blade()::make('body.menu');
        blade()::make('body.client', ['services' => $services, 'client' => $client]);
        blade()::make('footer.client', ['location' => $client->location, 'data' => $data]);
        blade()::make('footer.page-footer');
    }

    /**
     * Data Page.
     *
     * Show a Specific Service Data
     *
     * @param string $id The service to be hooked
     */
    public function data(string $id)
    {
        response()::type('text/html');

        $service = database()->select('service', $id);
        $service->id = $id;

        $data = database()->select('data', (new Select())->where('serviceId', $id)
            ->where('-clientTime < 0')->orderBy('-clientTime asc'));

        $graph = [
            json()::map(new Chart(), [
                'label' => $service->name,
                'data' => database()->select('data', (new Select())->where('serviceId', $service->id)
                    ->where('-clientTime < 0')->orderBy('-clientTime asc')),
            ]),
        ];

        blade()::make('header.data');
        blade()::make('body.menu');
        blade()::make('body.data', ['data' => $data, 'service' => $service]);
        blade()::make('footer.data', ['graph' => $graph]);
        blade()::make('footer.page-footer');
    }

    /**
     * This method it's used to Search Content from RAISe.
     *
     * It's used via AJAX request, mainly on the "Explore" tab on the
     *  Visualization System.
     */
    public function search()
    {
        $content = request()::query('content');

        $clientQuery = (new Select())->where("CONTAINS(lower(name), lower('{$content}')) OR '{$content}' IN tags")
            ->limit(10);
        $serviceQuery = (new Select())->where("CONTAINS(lower(name), lower('{$content}')) OR '{$content}' IN tags")
            ->limit(10);

        response()::setResponse(200, new \stdClass(), [
            'clients' => database()->select('client', $clientQuery),
            'services' => database()->select('service', $serviceQuery),
        ]);
    }
}
