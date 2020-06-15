<div class="form-group">
    <input type="checkbox" name='{{$name}}' id={{$name}} value="1" {{ (old($name) or $value) == 1 ? ' checked' : '' }}> 
    <label for={{$name}}>{{$title}}</label>    
</div>