<x-accept button="{{trans('messages.verify')}}" info="{{trans('messages.confirmation_info')}}" :verify="route('auth.success_confirmation', $verify)" >{{trans('messages.confirmation')}}</x-accept>
