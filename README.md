Easier upload process for Laravel 5

# Installation

composer require mydnic/uploader

In your controllers, add <code>use Mydnic\Uploader\Uploader;</code> at the top

When receiving a file through a form request, upload it with the imported class :

```
$filename = Uploader::upload(Request::file('image'));
```
