## Lapires - Laravel API Response

![Run Tests](https://github.com/datakrama/lapires/workflows/Run%20Tests/badge.svg) [![License](https://poser.pugx.org/datakrama/lapires/license)](//packagist.org/packages/datakrama/lapires)

Lapires is simple [Laravel](https://github.com/laravel/laravel "Laravel") package for generalizing all default response to API-friendly response. With this package, you will have a properly formatted JSON response. However, the response format is fixed, you can not change the format.

## Requirements
- [Laravel 7.x](https://github.com/laravel/laravel)

## Laravel Compatibility

|   Laravel                             | Package                                               |
| ------------------------------------- | ----------------------------------------------------- |
| [6.x](https://laravel.com/docs/6.x)   | [1.x](https://github.com/datakrama/lapires/tree/v1)   |
| [7.x](https://laravel.com/docs/7.x)   | [2.x](https://github.com/datakrama/lapires/tree/v2)   |


## Installation
`$ composer require datakrama/lapires:"~2.0"`

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

### Error Handling and Exception

Thanks to [Package Discovery](https://laravel.com/docs/6.x/packages#package-discovery), all error handling responses are handled automatically.

## Credit
- [Ahmad Husen](https://github.com/husenisme)

This package is made because inspiration from [https://github.com/Cerwyn/laravel-generalizing-response](https://github.com/Cerwyn/laravel-generalizing-response).

# Licence
The MIT License (MIT). Please see [License File](https://github.com/datakrama/lapires/blob/master/LICENSE.md "License File") for more information.
