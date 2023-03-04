UUIDGenerator
=============

The `UUIDGenerator` class is a secure and efficient way to generate UUIDs (Universally Unique Identifiers) in PHP. It generates UUIDs according to the RFC 4122 standard, which ensures that the UUIDs are unique across time and space.

### Installation

You can install the `UUIDGenerator` class using Composer. Run the following command in your terminal:

    composer require devuri/uuid-generator

Alternatively, you can manually include the `UUIDGenerator` class in your PHP project.

### Usage

To use the `UUIDGenerator` class, first import the class using the `use` keyword:
```php
use Devuri\UUIDGenerator\UUIDGenerator;
```
Then, create a new instance of the `UUIDGenerator` class:
```php
$uuidGenerator = new UUIDGenerator();
```
You can optionally specify the version and variant of the UUID you want to generate. The version determines the layout of the UUID, while the variant determines the encoding of the UUID. The default version is 4 (random), and the default variant is the RFC 4122 variant.
```php
$uuidGenerator = new UUIDGenerator(1, 0x80);
```
To generate a new UUID, call the `generateUUID()` method:
```php
$uuid = $uuidGenerator->generateUUID();
```
The generateUUID() method returns a string in the following format:
```shell
xxxxxxxx-xxxx-Mxxx-Nxxx-xxxxxxxxxxxx
```
Where:

*   `**x**` is a hexadecimal digit **(0-9, a-f)**
*   `**M**` is the version number **(1-5)**
*   **`N`** is the variant number **(8, 9, a, b)**

### Example

Here's an example of how to use the `UUIDGenerator` class to generate a new UUID:
```php
    use Devuri\UUIDGenerator\UUIDGenerator;
    
    $uuidGenerator = new UUIDGenerator();
    $uuid = $uuidGenerator->generateUUID();
    
    echo $uuid;
```
This code creates a new instance of the `UUIDGenerator` class, generates a new UUID, and then prints the UUID to the screen.

### Security

The `UUIDGenerator` class uses a secure and efficient method to generate UUIDs. It generates random bytes using the `random_bytes()` function, which is a cryptographically secure random number generator. It then sets the version and variant bits according to the RFC 4122 standard.

### License

The `UUIDGenerator` class is open-source software licensed under the MIT License. See the `LICENSE` file for more information.
