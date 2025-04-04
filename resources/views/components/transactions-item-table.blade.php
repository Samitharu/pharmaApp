<div>
    <table id="transactionsTable" class="table table-bordered">
        <thead class="table-dark">
            <tr>
                @foreach ($columns as $column)
                <th>{{ $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
            <tr>
                @foreach ($columns as $column)
                <td>
                    @if (is_array($row[$column]))
                    <input type="{{ $row[$column]['type'] }}" 
       placeholder="{{ $row[$column]['placeholder'] }}" 
       class="form-control item-input {{ $row[$column]['class'] ?? '' }}" 
       @isset($row[$column]['onfocus']) onfocus="{{ $row[$column]['onfocus'] }}" @endisset 
       @isset($row[$column]['oninput']) oninput="{{ $row[$column]['oninput'] }}" @endisset>

                    @else
                    {!! $row[$column] !!}
                    @endif
                </td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>