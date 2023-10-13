<div class="practice-sidebar">
    <div class="sin-sidebar">
        <div class="wid-heading">
            <p>Quick Links</p>
        </div>
        <div class="prac-sb-list">
            <ul>
                @if(!empty($menulist['quicklinks']))
                @foreach($menulist['quicklinks'] as $item)
                <li><a href="{{ $item['link'] }}" class="active">{{ $item['label'] }}</a></li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>