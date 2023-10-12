<label for="{{$field}}" class="form-label">{{$label}}</label>
<textarea name="{{$field}}" id="{{$field}}" cols="15" rows="5" class="form-control"  placeholder= "{{$placeholder}}">{{old($placeholder, $value)}}</textarea>

@error("$field")
<span class="text-danger">{{$message}}</span>
@enderror
