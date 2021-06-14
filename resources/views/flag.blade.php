<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Country Name</th>
            <th>Alpha2 Code</th>
            <th>Alpha3 Code</th>
            <th>Region</th>
            <th>Numeric Code</th>
            <th>Native Name</th>
            <th>Cioc</th>
            <th>Flag</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $flag)
        <tr>
            <td>{{$flag->name}}</td>
            <td>{{$flag->alpha2Code}}</td>
            <td>{{$flag->alpha3Code}}</td>
            <td>{{$flag->region}}</td>
            <td>{{$flag->numericCode}}</td>
            <td>{{$flag->nativeName}}</td>
            <td>{{$flag->cioc}}</td>
            <td><img src="{{$flag->flag}}" height="50px" width="50px" alt=""> </td>
        </tr>
        @endforeach

    </tbody>
</table>