 @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                $(document).ready(function () {
                    $.jGrowl('{!! $error !!}', {
                        theme: 'bg-danger'
                    });
                });
            </script>
        @endforeach
@elseif (session()->get('flash_success'))
     @if(is_array(json_decode(session()->get('flash_success'), true)))
         <script>
             $(document).ready(function () {
                 $.jGrowl('{!! implode('', session()->get('flash_success')->all(':message<br/>')) !!}', {
                     theme: 'bg-success'
                 });
             });
         </script>
     @else
         <script>
             $(document).ready(function () {
                 $.jGrowl('{!! session()->get('flash_success') !!}', {
                     theme: 'bg-success'
                 });
             });
         </script>
     @endif
@elseif (session()->get('flash_warning'))
     @if(is_array(json_decode(session()->get('flash_warning'), true)))
         <script>
             $(document).ready(function () {
                 $.jGrowl('{!! implode('', session()->get('flash_warning')->all(':message<br/>')) !!}', {
                     theme: 'bg-warning'
                 });
             });
         </script>
     @else
         <script>
             $(document).ready(function () {
                 $.jGrowl('{!! session()->get('flash_warning') !!}', {
                     theme: 'bg-warning'
                 });
             });
         </script>
     @endif
@elseif (session()->get('flash_info'))
     @if(is_array(json_decode(session()->get('flash_info'), true)))
         <script>
             $(document).ready(function () {
                 $.jGrowl('{!! implode('', session()->get('flash_info')->all(':message<br/>')) !!}', {
                     theme: 'bg-info'
                 });
             });
         </script>
     @else
         <script>
             $(document).ready(function () {
                 $.jGrowl('{!! session()->get('flash_info') !!}', {
                     theme: 'bg-info'
                 });
             });
         </script>
     @endif
@elseif (session()->get('flash_danger'))
     @if(is_array(json_decode(session()->get('flash_danger'), true)))
         <script>
             $(document).ready(function () {
                 $.jGrowl('{!! implode('', session()->get('flash_danger')->all(':message<br/>')) !!}', {
                     theme: 'bg-danger'
                 });
             });
         </script>
     @else
         <script>
             $(document).ready(function () {
                 $.jGrowl('{!! session()->get('flash_danger') !!}', {
                     theme: 'bg-danger'
                 });
             });
         </script>
     @endif
@elseif (session()->get('flash_message'))
     @if(is_array(json_decode(session()->get('flash_message'), true)))
         <script>
             $(document).ready(function () {
                 $.jGrowl('{!! implode('', session()->get('flash_message')->all(':message<br/>')) !!}', {
                     theme: 'bg-info'
                 });
             });
         </script>
     @else
         <script>
             $(document).ready(function () {
                 $.jGrowl('{!! session()->get('flash_message') !!}', {
                     theme: 'bg-info'
                 });
             });
         </script>
     @endif
@endif