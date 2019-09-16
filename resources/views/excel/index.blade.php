<!DOCTYPE html>
<html>
<head>
    <title>MaatWebsite Excel to database Task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script> window.Laravel = { csrfToken: '{{ csrf_token() }}' } </script>

</head>
<body>


	<div class="container">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

		<div id="app">
	        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
				<import-excel-component> </import-excel-component>
    	    </form>
                <view-excel-component> </view-excel-component>
        </div>

	</div>   


{{-- <div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            MaatWebsite Excel to database Task
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import File</button>
            </form>
        </div>
    </div>
</div>

@if(isset($headers) && isset($headerData))
<div class="container">
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr style="text-align:center;">
                    @foreach($headers as $header)
                        <th scope="col">{{ $header->name }}</th>
                    @endforeach
                    </tr>
                </thead>
                <tbody>
                @foreach($headerData->chunk(count($headers)) as $chunk)
                    <tr>
                        @foreach($chunk as $item)
                            <td>{{ $item->value }} </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif --}}

<script src="{{asset('js/app.js')}}"> </script>

</body>
</html>