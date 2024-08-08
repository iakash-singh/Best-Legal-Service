<div>
    <div class="form-group form-with-feedback left">
        <form action="get">
            <i class="fas fa-fw fa-search"></i>
            <input type="text" id="autosuggestfor" class="form-control curved @if ($term != '') opened @endif" placeholder="" wire:model="term" autosuggest="false">
            <ul class="suggestionList" wire:loading.remove>
                @if ($term == '')
                    <div>
                    </div>
                @else
                    @if ($services->isEmpty())
                        <script type="text/javascript">
                            window.location = "contact";
                        </script>
                    @else
                        @foreach ($services as $user)
                            <li>
                                <a class="mb-0 text-capitalize" href="{{ route('singleService', $user->slug) }}">{{ $user->ser_name }}</a>
                            </li>
                        @endforeach
                    @endif
                @endif
            </ul>
        </form>
    </div>
</div>
