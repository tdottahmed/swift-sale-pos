<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            All Campaign
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                            <th>SL</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Body</th>
                            <th>Audience</th>
                            <th>Campaign Type</th>
                            <th class="text-center">Action</th>
                        </x-slot>
                        <x-slot name="body">
                        @foreach ($campaigns as $campaign)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $campaign->title }}</td>
                                <td>{{ $campaign->description }}</td>
                                <td>{{ $campaign->body }}</td>
                                <td>{{\App\Models\ContactType::find($campaign->contact_type_id)->title}}</td>
                                <td>{{ $campaign->campaign_type}}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a onclick="openModal('{{route('campaign.edit', $campaign->id)}}', 'Create Campaign')"
                                                    class="dropdown-item"
                                                    ><i class="icon-pencil7"></i> Edit
                                                    Campaign</a>
                                                <a href="{{ route('campaign.sendEmail', $campaign->id) }}"
                                                    class="dropdown-item"
                                                    ><i class="icon-envelop2"></i> Send
                                                    Email</a>
                                                <a href="{{ route('campaign.sendSms', $campaign->id) }}"
                                                    class="dropdown-item"
                                                    ><i class="icon-comment"></i> Send
                                                    SMS</a>
                                                <form style="display:inline"
                                                    action="{{ route('campaign.destroy', $campaign->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this campaign?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item" title="Delete expense">
                                                        <i class="icon-trash-alt"></i>Delete
                                                    </button>
                                                </form>
                                                {{-- <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
												<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </x-slot>
                </x-data-display.table>
        </x-slot>
        <x-slot name="cardFooterCenter">

            <button type="button" class="btn bg-indigo-800" onclick="openModal('{{route('campaign.create')}}', 'Create Campaign')">
                Create <i class="icon-plus3 ml-2"></i>
            </button>
        </x-slot>
    </x-data-display.card>
    {{-- @include('campaign.create-modal') --}}
</x-layouts.master>
