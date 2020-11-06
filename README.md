## Lapires - Laravel API Response

![GitHub Workflow Status (branch)](https://img.shields.io/github/workflow/status/datakrama/lapires/CI?label=CI&style=flat-square) ![Packagist Version](https://img.shields.io/packagist/v/datakrama/lapires?style=flat-square) ![Packagist Downloads](https://img.shields.io/packagist/dm/datakrama/lapires?style=flat-square) ![Packagist License](https://img.shields.io/packagist/l/datakrama/lapires?style=flat-square)

Lapires is simple [Laravel](https://github.com/laravel/laravel "Laravel") package for generalizing all default response to API-friendly response. With this package, you will have a properly formatted JSON response. However, the response format is fixed, you can not change the format.

## Requirements
- [Laravel 7.x|8.x](https://github.com/laravel/laravel)

## Laravel Compatibility

|   Laravel                             | Package                                               |
| ------------------------------------- | ----------------------------------------------------- |
| [6.x](https://laravel.com/docs/6.x)   | [1.x](https://github.com/datakrama/lapires/tree/v1)   |
| [7.x](https://laravel.com/docs/7.x)   | [2.x](https://github.com/datakrama/lapires/tree/v2)   |
| [8.x](https://laravel.com/docs/8.x)   | [2.x](https://github.com/datakrama/lapires/tree/v2)   |


## Installation
`$ composer require datakrama/lapires:"^2.0"`

## Config (Optional)

If you need to disable custom exception response from this package, publish the config file, and change `exception` option to `false`.

`$ php artisan vendor:publish --provider="Datakrama\Lapires\LapiresServiceProvider"`

## Usages

All responses will be formatted as follows:

```
// Success response

{
    "success": true,
    "message": ...,
    "data": {
        ...
    }
}
```

```
// Error response

{
    "success": false,
    "message": ...,
    "errors": {
        ...
    }
}
```

### General

```
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datakrama\Lapires\Traits\ApiResponser;

class HomeController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Success response
     *
     * @return void
     */
    public function success()
    {
        $data = ['foo' => 'bar'];
        $message = 'This is example success response.';
        $code = 200;
        return $this->successResponse($data, $message, $code);
    }

    /**
     * Error response
     *
     * @return void
     */
    public function error()
    {
        $code = 500;
        $message = 'This is example error response.';
        $errors = ['foo' => 'bar'];
        return $this->successResponse($code, $message, $errors);
    }
}

```

## Thanks
This package is made because inspiration from [https://github.com/Cerwyn/laravel-generalizing-response](https://github.com/Cerwyn/laravel-generalizing-response).

## Licence
The MIT License (MIT). Please see [License File](https://github.com/datakrama/lapires/blob/master/LICENSE.md "License File") for more information.
