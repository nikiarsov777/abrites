@section('page')
    @if (isset($sub_page) && $sub_page != '')
        @include($sub_page)
    @else
        <div>{{_('Hello')}}, {{auth()->user()->name}}</div>
    @endif
@endsection
