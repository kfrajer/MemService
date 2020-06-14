<div class="form-group">
    <label for={{$name}}>{{$title}}</label>
    <input type="text" name={{$name}} id={{$name}} class="form-control {{$errors->has($name) ? 'is-invalid' : '' }}" value="{{old($name)}}" placeholder="Enter {{$name}}"> 
    @if($errors->has($name))
        <span class="invalid-feedback">
            {{$errors->first($name)}}
        </span>
    @endif
</div>

