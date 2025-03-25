<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
    <div class="modal-dialog {{ $size }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="col-6 mt-5 ml-5"> 
                <input type="text" id="popUpSearchInput" data-id ="{{ $searchingTable }}" class="form-control mb-3" placeholder="Search products..." oninput="searchTable(this)">
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            @if ($footer)
                <div class="modal-footer">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
