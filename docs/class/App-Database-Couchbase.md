App\Database\Couchbase
===============

Class Couchbase.

A Couchbase Handler is a Database Handler that
Handles and does all operations with a Couchbase Database


* Class name: Couchbase
* Namespace: App\Database
* This class implements: [App\Models\Interfaces\Database](App-Models-Interfaces-Database.md)




Properties
----------


### $connection

The Couchbase Cluster Connection Instance.



```php
private \CouchbaseCluster $connection = null
```

#### Details:
* Visibility: **private**

<hr>

### $authenticator

The Couchbase Authenticator.



```php
private \Couchbase\PasswordAuthenticator $authenticator = null
```

#### Details:
* Visibility: **private**

<hr>

Methods
-------


### connect

Connect to the Database.



```php
mixed App\Models\Interfaces\Database::connect(array or object $connection)
```

#### Details:
* Visibility: **public**
* This method is defined by [App\Models\Interfaces\Database](App-Models-Interfaces-Database.md)


#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| $connection | array or object | the connection string |


<hr>

### destroy

Destroy the Connection.

(only if the connection it's already active)

```php
mixed App\Models\Interfaces\Database::destroy()
```

#### Details:
* Visibility: **public**
* This method is defined by [App\Models\Interfaces\Database](App-Models-Interfaces-Database.md)



<hr>

### insert

Insert Data on Database.



```php
integer|string App\Models\Interfaces\Database::insert(string $table, \App\Models\Communication\Model $data, string $primaryKey)
```

#### Details:
* Visibility: **public**
* This method is defined by [App\Models\Interfaces\Database](App-Models-Interfaces-Database.md)


#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| $table | **string** | desired table to insert |
| $data | [App\Models\Communication\Model](App-Models-Communication-Model.md) | data to be inserted |
| $primaryKey | **string** | defined primary key or generated |


<hr>

### select

Select Data on Database.



```php
\App\Models\Communication\Model|array|object|string App\Models\Interfaces\Database::select(string $table, string or \Koine\QueryBuilder\Statements\Select or \Koine\QueryBuilder $query, boolean $override)
```

#### Details:
* Visibility: **public**
* This method is defined by [App\Models\Interfaces\Database](App-Models-Interfaces-Database.md)


#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| $table | **string** | desired table to select |
| $query | string or \Koine\QueryBuilder\Statements\Select or \Koine\QueryBuilder | a Select query to search |
| $override | **boolean** | If need override the select statement |


<hr>

### update

Update an Element of the Database.



```php
array|string|object App\Models\Interfaces\Database::update(string $table, string $primaryKey, \App\Models\Communication\Model or object $data)
```

#### Details:
* Visibility: **public**
* This method is defined by [App\Models\Interfaces\Database](App-Models-Interfaces-Database.md)


#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| $table | **string** | desired table to update |
| $primaryKey | **string** | desired element to update |
| $data | App\Models\Communication\Model or object | data to update |


<hr>

### delete

Delete an Element of the Database.



```php
mixed App\Models\Interfaces\Database::delete(string $table, string $primaryKey)
```

#### Details:
* Visibility: **public**
* This method is defined by [App\Models\Interfaces\Database](App-Models-Interfaces-Database.md)


#### Parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| $table | **string** | desired table to update |
| $primaryKey | **string** | desired element to delete |


<hr>

### getConnection

Get the Database Connection Handler.



```php
mixed|boolean App\Models\Interfaces\Database::getConnection()
```

#### Details:
* Visibility: **public**
* This method is defined by [App\Models\Interfaces\Database](App-Models-Interfaces-Database.md)



<hr>

### getAuthenticator

Get the Couchbase Authenticator Handler.



```php
\Couchbase\PasswordAuthenticator App\Database\Couchbase::getAuthenticator()
```

#### Details:
* Visibility: **public**



<hr>
