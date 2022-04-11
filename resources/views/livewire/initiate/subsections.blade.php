@foreach ($subsections as $section)
    <details>
        <summary>{{ $section->name }}
            <div>
                @can('forqanshahid.addSection', Auth::user()->id)
                    <button wire:click="setSection({{ $section->id }})" data-bs-target='#add' data-bs-toggle='modal'
                        class="btn btn-info comp-btn section-btn">
                        <li class="fa fa-plus"></li>
                    </button>
                @endcan
                @can('forqanshahid.editSection', Auth::user()->id)
                    <button wire:click="setSection({{ $section->id }})" data-bs-target='#edit' data-bs-toggle='modal'
                        class="btn btn-info comp-btn section-btn">
                        <li class="fa fa-edit"></li>
                    </button>
                @endcan
                @if (count($section->subsections) <= 0)
                    @can('forqanshahid.deletSection', Auth::user()->id)
                        <button data-bs-target="#delete" data-bs-toggle="modal"
                            wire:click='setSection({{ $section->id }})' class="btn btn-danger">
                            <li class="fa fa-trash"></li>
                        </button>
                    @endcan
                @endif
            </div>

        </summary>
        <div class="folder">
            @if (count($section->subsections))
                @include('livewire.initiate.subsections', [
                    'subsections' => $section->subsections,
                    'id' => $section->id,
                ])
            @endif
        </div>

    </details>
@endforeach
