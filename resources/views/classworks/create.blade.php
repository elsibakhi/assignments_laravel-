<x-main-layout title="Create classwork"> 



<div class="container my-5">


  <x-alert class="alert-success" name="success"  />
<x-alert class="alert-error" name="error"  />

    <form class="w-50" action={{route("classrooms.classworks.store",[$classroom->id , "type"=>$type])}} method="POST" enctype="multipart/form-data" >
      
     @csrf
        <h1>Create classwork</h1>
        <hr>
       

<x-classwork.form button-label="Create {{$type}}" :topics='$topics' />

      </form>

</div>
  

</x-main-layout>





