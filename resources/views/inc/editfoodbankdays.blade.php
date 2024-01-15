                <div class="row">{{$i}}
                <select class="col-4 col-md-2" name="calcDay{{$i}}">
                    <option value="">Select day</option>
                    @foreach($days as $day)
                    <option value="{{$day}}" {{$fbcalcDay == $day ? 'selected' : ''}}>{{$day}}</option>
                    @endforeach
                </select>
                <input type="text" class="col-4 col-md-2" name='calcDayNum{{$i}}' value='{{$fbcalcDayNum}}'>
                </div>