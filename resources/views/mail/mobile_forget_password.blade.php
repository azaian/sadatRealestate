
@component('mail::message')
    <div>
        <div style="text-align:right">
            <img src="{{asset('images/main_images/logo.png')}}"  width="100px" >
        </div>

        <br>
        <p style="text-align:right"> هل نسيت كلمة المروري </p>

        <br>
        <img src="{{asset('images/main_images/char2.png')}}"  width="100px" style="float:left;margin-top:70px">




         رقمك السرى الجديد
         {{$newpassword}}


        <img src="{{asset('images/main_images/char15.png')}}"  width="100px"  >


            <br>
            <br>
            <br>       <br>
            <hr>
            <br>
            ,شكرا<br>
            {{ config('app.name') }}


    </div>



@endcomponent
