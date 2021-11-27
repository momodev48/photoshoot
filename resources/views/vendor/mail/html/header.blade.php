<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
    <div class="logo">
        <x-application-logoblack/>
    </div>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
