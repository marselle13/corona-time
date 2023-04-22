<x-accept button="{{trans('messages.recover')}}" info="{{trans('messages.recover_info')}}"
          :link="route('passwords.update_page', [$user,$reset])">{{trans('messages.recover')}}</x-accept>
