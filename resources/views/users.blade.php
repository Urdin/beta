<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">


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



	{{--  
	{{$users}}

	{{$userid}}
	{{$privat_list}}

        --}}

	<div class=" position-ref full-height">



            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
		    <a href="{{ url('/logout') }}">Logout</a>
            @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth
                </div>
            @endif


	    <table class="table table-striped">

		<thead class="thead-dark">
		    <tr>
			<th scope="col">id</th>
			<th scope="col">Name</th>
			<th scope="col">e-mail</th>
			<th scope="col">Add contact to private list</th>

		    </tr>
		</thead>
		<tbody>

		    @foreach ($users as $user)

			<tr>
			    <th scope="row">{{$user->id}}</th>
			    <td>{{$user->name}}</td>
			    <td>{{$user->email}}</td>

			    <td>
				<div class="form-check">
				    <input type="checkbox" class="form-check-input" user_id="{{$user->id}}">
				</div>
			    </td>

			</tr>


                    @endforeach



		</tbody>

	    </table>

            <button type="button" class="btn btn-primary">Change Private List</button>

	</div>




        <script src="/js/app.js"></script>

	<script>

         $( document ).ready(function() {

                $.ajax({
                    url: "/getList",
                    data: {},
                    type: 'GET',
                    datatype: 'JSON',
                    success: function(list){

                        $(".form-check-input").each(function (elem){

			    let id = $(this).attr("user_id");
			    
			    list.forEach(function (val, index, array) {
				if (val['contact_id'] == id) {
                                    console.log(id);
				    $(this).prop( "checked",true);
				};
                            },this);

			})

			

                    }


                });    

         });


         $('.btn').on('click',function(){

	     var user_id=[];  

              $(".form-check-input").each(function (elem){
                if ($(this).prop( "checked" )){
		    user_id.push($(this).attr("user_id"));
                }
              })


                $.ajax({
                    url: "/addToList",
                    data: {user_id},
                    type: 'GET',
                    datatype: 'JSON',
                    success: function(msg){
                        console.log(msg); 
                    }
                });    


	 })



    

	</script>

	

    </body>
</html>
