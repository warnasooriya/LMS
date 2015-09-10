 
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            Teacher Name
        </div>
        <div class="col-md-9">
            <input type="text" name="name" id="name" placeholder=" Teacher Name" class="span8 form-control" required>
        </div>
    </div>
</div>
<p></p>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            Email Address
        </div>
        <div class="col-md-9">
            <input type="email" name="email" id="email" placeholder=" Email Address" class="span8 email form-control" required>
        </div>
    </div>
</div>
<p></p>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            Password
        </div>
        <div class="col-md-3">
            <input type="password" name="pass" id="pass" placeholder=" Password" class="span2 password form-control" required onchange="Validate_Confirm_Password('pass', 'passc');">
        </div><div class="span1" id="conformp1"></div>
        <div class="col-md-3">
            <input type="password" name="passc" id="passc" placeholder=" Confirm Password" class="col-md-2 password form-control" required onchange="Validate_Confirm_Password('pass', 'passc');">
        </div><div class="span1" id="conformp2"></div>
    </div>
</div>
<p></p>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            Contact Number
        </div>
        <div class="col-md-3">
            <div class="input-prepend">
                <span class="add-on glyphicons phone"><i></i></span>
                <input type="text" id="contactno" name="contactno" class="input-large col-md-2 form-control" placeholder="+9612345678" required>
            </div>
        </div>
    </div>
</div>
<p></p>


<div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            Address
        </div>
        <div class="col-md-9">
            <input type="text" name="address" id="address" placeholder="Address" class="span8 form-control">
        </div>
    </div>
</div>

<p></p>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            Info..
        </div>
        <div class="col-md-9">
            <textarea class="span8 form-control" name="info" id="info" placeholder="Description About Teacher"></textarea>
        </div>
    </div>
</div>

<p></p>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            Photo
        </div>
        <div class="col-md-4">
            <input type="file" class="fileupload form-control" id="photo" name="photo" required accept="image/*"  onchange="showMyImage(this, 'userphoto')">
        </div>
        <div class="col-md-4">
            <div class="thumbnail span3">
                <img src="images/teacheravatar.png" id="userphoto">
            </div>
        </div>
    </div>
</div>

<p></p>
<div class="row">
    <div class="col-md-12">
    <div class="col-md-3">

    </div>
    <div class="col-md-3">
        <button type="submit" disabled id="btn" name="btn" class="btn btn-icon btn-success  glyphicons circle_ok pull-right form-control"><i></i>Register</button>

    </div>
    </div>
</div>

