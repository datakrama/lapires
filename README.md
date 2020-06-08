## Lapires - Laravel API Response

Lapires is simple [Laravel](https://github.com/laravel/laravel "Laravel") package for generalizing all default response to API-friendly response. With this package, you will have a properly formatted JSON response. However, the response format is fixed.

## Requirements
- [Laravel 6.x](https://github.com/laravel/laravel)

## Installation
`$ composer require datakrama/lapires`

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

## Credits
- [Ahmad Husen](https://github.com/husenisme)

This package is made because inspiration from [https://github.com/Cerwyn/laravel-generalizing-response](https://github.com/Cerwyn/laravel-generalizing-response).

# Licence
The MIT License (MIT). Please see [License File](https://github.com/datakrama/lapires/blob/master/LICENSE.md "License File") for more information.
