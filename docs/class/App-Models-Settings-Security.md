App\Models\Settings\Security
===============

Class Security.

A Setting Model that describes Security Interfaces,
that are used for Security artifacts.


* Class name: Security
* Namespace: App\Models\Settings
* Parent class: [App\Models\Communication\Model](App-Models-Communication-Model.md)





Properties
----------


### $expireTime

The Authorization Token expire time,
this property uses the php's strtotime()
method to describe how many time will be added
until the token expires summed with the current time.



```php
public string $expireTime = '2hours'
```

#### Details:
* Visibility: **public**

<hr>

### $secretKey

The Secret Key that will be used on the JWT hash,
the JWT hash is used as Authentication Hash on RAISe.



```php
public string $secretKey = 'default-raise-secret-key'
```

#### Details:
* Visibility: **public**

<hr>

### $debug

The Debug Variable enables full php Logging
except with Notices and Warnings.

Only PHP Errors. Not recommended for Production.

```php
public boolean $debug = false
```

#### Details:
* Visibility: **public**

<hr>

### 





```php
public \App\Models\Settings\Security 
```

#### Details:
* Visibility: **public**

<hr>

Methods
-------


### encode

Get all public properties of the Model
It's used for the Response Mapping on Lists.



```php
array App\Models\Communication\Model::encode()
```

#### Details:
* Visibility: **public**
* This method is defined by [App\Models\Communication\Model](App-Models-Communication-Model.md)



<hr>
