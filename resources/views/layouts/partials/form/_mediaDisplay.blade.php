<ul class="mailbox-attachments clearfix">
    @foreach ($model->getMedia($reference) as $mediaItem)
        <li>
            @switch($mediaItem->mime_type)
                @case('image/png')
                @case('image/jpeg')
                    <span class="mailbox-attachment-icon has-img">
                        <img src="{{ $mediaItem->getUrl() }}" alt="Attachment">
                    </span>    
                    @break
                @case('application/pdf')
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>                                    
                    @break
                @case('application/vnd.openxmlformats-officedocument.wordprocessingml.document')
                @case('application/msword')
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>
                    @break
                @case('application/vnd.ms-excel')
                @case('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                    <span class="mailbox-attachment-icon"><i class="fa fa-file-excel-o"></i></span>
                    @break
                @default
                    <span class="mailbox-attachment-icon"><i class="fa fa-file"></i></span>                                                                            
            @endswitch
            <div class="mailbox-attachment-info">
                <a href="#" class="mailbox-attachment-name">
                    @if ($mediaItem->mime_type == 'image/png' || $mediaItem->mime_type == 'image/jpeg')
                        <i class="fa fa-camera"></i> 
                    @else
                        <i class="fa fa-paperclip"></i>
                    @endif

                    {{ str_limit($mediaItem->name, 18, '...') }} </a>
                <span class="mailbox-attachment-size">
                    {{ $mediaItem->human_readable_size }}
                    <a href="{{ route("{$reference}.deletefiles", [$model->id, $mediaItem->id]) }}" data-title="Delete Attachment"
                        class="btn btn-danger btn-xs pull-right deletelink" role="button"><i class="fa fa-times"></i></a>
                    <a href="{{ $mediaItem->getUrl() }}" class="btn btn-primary btn-xs pull-right mailbox-attachment-download" target="_blank"><i class="fa fa-cloud-download"></i></a>
                </span>
            </div>
        </li>
    @endforeach
</ul>