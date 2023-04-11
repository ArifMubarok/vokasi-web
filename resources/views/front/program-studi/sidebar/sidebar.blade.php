<div class="col-lg-4 col-md-6 col-sm-12">
    <table class="basic-table" data-aos="fade-up" data-aos-delay="150">
        @foreach ($informasi as $item)
            @if ($item->header == 'Link')
                {{ null }}
            @else
                <tr>
                    <th class="text-center">{{ $item->header }}</th>
            @endif
            </tr>
            @if ($item->header == 'Link')
                {{ null }}
            @else
                <tr>
                    <td
                        style="border-left: 1px solid #6c757d;border-right: 1px solid #6c757d;border-bottom: 1px solid #6c757d">
                        {!! $item->value !!}
            @endif
            </td>
            </tr>
        @endforeach
    </table>
    @if (isset($link))
        <div class="box bg-2">
            <a href="{!! $link->value !!}"
                class="text-center button button--moema button--text-thick button--text-upper button--size-s">Go To Web
                Prodi
                {{ $head }}</a>
        </div>
    @endif
</div>
