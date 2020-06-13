@extends('layout.pagecore')

@section('content')
<div class="qfc-container">
      <h2>New Session</h2>
      <label>Sign in to start a new session</label>
      
    <form action="#" methood="get">
    <div class="form-group">
        <label for="txtEmail">User Email</label>
        <input type="text" name="txtEmail" id="txtEmail" class="form-control" required />
    </div>
    <fieldset disabled>
        <div class="form-group">
        <label for="txtPwd">Password</label>
        <input type="password" name="txtPwd" id="txtPwd" class="form-control" />
        </div>
    </fieldset>
    <div>
        <!-- <button id="usrsubmit" type="submit" value="submit" onclick="return submitNow();">Submit</button> -->
        <button id="btnLogin" class="btn btn-primary" onclick="return createSessionEvt();">Log in</button>
        <button id="btnSignUp" class="btn btn-primary">Sign up</button>
        <button id="btnLogout" class="btn btn-primary hide">Log out</button>
    </div>  
    </form>
    
    <script>     
    function createSessionEvt() {
        console.log("Creating session...");
        console.log("To be done....");
        alert("Submit button clicked!");
        return true;      
    }      
    </script>
      
    </div> 
@endsection