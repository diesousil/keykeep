<li @if($isRoot)
        class="root-node"
    @else
        class="child-node"
    @endif
 
    data-node-id="{{ $nodeData["id"] }}">

    <span class="title"> {{ $nodeData['name'] }}</span>

    @if(count($nodeData["credentials"]) > 0)
        <ul class="credentials">
            @foreach($nodeData["credentials"] as $credential)
            <li>{{ $credential["title"] }} </li>
            @endforeach
        </ul>
    @endif

    @if(!empty($childrenHtml))
        <ul class="children">
            {!! $childrenHtml !!}
        </ul>
    @endif
</li>