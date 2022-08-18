<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>

    <body>

    <nav class="navbar navbar-expand-lg bg-dark ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

       @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
        </li>
      @endforeach

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="{{__(key:'messages.Search')}}" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"> {{__(key:'messages.Search')}}</button>
      </form>
    </div>
  </div>
</nav>

        <div class="flex-center position-ref full-height">
           

            <div class="content">
                <div class="title m-b-md">
                   {{__( key:'messages.Edit Offer')}} 
                </div>

                @if(Session::has('success'))
                   <div class="alert alert-success" role="alert">
                     {{ Session::get('success')}}
                   </div>
                @endif   
                     
            <form method="POST" action="{{route('offers.update',$offer-> name_ar)}}" >

             @csrf
            {{-- <input name="_token" value="{{csrf_token()}}">  --}}

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{__(key:'messages.Offer ar_Name')}}</label>
                <input type="text" class="form-control" name='name_ar' value={{$offer-> name_ar}}  placeholder="{{__(key:'messages.Name')}}" >
               
                @error('name_ar')
                <small class="from-text text-danger">{{$message}}</small>
                @enderror

              
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">{{__(key:'messages.Offer en_Name')}}</label>
                <input type="text" class="form-control" name='name_en' value={{$offer-> name_en}} placeholder="{{__(key:'messages.Name')}}" >
               
                @error('name_en')
                <small class="from-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">{{__(key:'messages.Offer Price')}}</label>
                <input type="text" class="form-control" name='price' value={{$offer-> price}} placeholder="{{__(key:'messages.Price')}}">
                @error('price')
                <small class="from-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">{{__(key:'messages.Offer ar_Details')}}</label>
                <input type="text" class="form-control" name='detals_ar' value={{$offer-> details_ar}}  placeholder="{{__(key:'messages.Details')}}">
                
                @error('detals_ar')
                <small class="from-text text-danger">{{$message}}</small>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">{{__(key:'messages.Offer en_Details')}}</label>
                <input type="text" class="form-control" name='detals_en'  value={{$offer -> details_en}}   placeholder="{{__(key:'messages.Details')}}">
                
                @error('detals_en')
                <small class="from-text text-danger">{{$message}}</small>
                @enderror
            
            </div>

            
            <button type="submit" class="btn btn-primary"> {{__(key:'messages.Save Offer')}}</button>
            </form>
                        
        </div>
    </body>
</html>
