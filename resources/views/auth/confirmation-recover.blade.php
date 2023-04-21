<x-accept button="{{trans('messages.recover')}}" info="{{trans('messages.recover_info')}}"
          :verify="route('auth.new_password', [$user,$reset])">{{trans('messages.recover')}}</x-accept>
