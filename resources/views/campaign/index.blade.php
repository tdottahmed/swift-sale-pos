<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('All Campaigns') }}
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Body') }}</th>
                    <th>{{ __('Audience') }}</th>
                    <th>{{ __('Campaign Type') }}</th>
                    <th class="text-center">{{ __('Action') }}</th>
                </x-slot>
                <x-slot name="body">
                    @foreach ($campaigns as $campaign)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $campaign->title }}</td>
                            <td>{{ $campaign->description }}</td>
                            <td>{{ $campaign->body }}</td>
                            <td>{{ \App\Models\ContactType::find($campaign->contact_type_id)->title }}</td>
                            <td>{{ $campaign->campaign_type }}</td>
                            <td class="text-center">
                                <x-action.table-action :actions="[
                                    [
                                        'route' => 'campaign.edit',
                                        'params' => $campaign->id,
                                        'label' => 'Edit Campaign',
                                        'icon' => 'icon-pencil7',
                                    ],
                                    [
                                        'route' => 'campaign.sendEmail',
                                        'params' => $campaign->id,
                                        'label' => 'Send Email',
                                        'icon' => 'icon-envelop2',
                                    ],
                                    [
                                        'route' => 'campaign.sendSms',
                                        'params' => $campaign->id,
                                        'label' => 'Send SMS',
                                        'icon' => 'icon-comment',
                                    ],
                                    [
                                        'route' => 'campaign.destroy',
                                        'params' => $campaign->id,
                                        'label' => 'Delete Campaign',
                                        'icon' => 'icon-trash-alt',
                                        'method' => 'delete',
                                    ],
                                ]" />
                            </td>
                        </tr>
                    @endforeach

                </x-slot>
            </x-data-display.table>
        </x-slot>
        <x-slot name="cardFooterCenter">

            <a href="{{ route('campaign.create') }}" class="btn bg-indigo-800">
                Create <i class="icon-plus3 ml-2"></i>
            </a>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
