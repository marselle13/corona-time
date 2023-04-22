<x-accept button="{{trans('messages.verify')}}" info="{{trans('messages.confirmation_info')}}" :link="route('emails.confirmation', [$user,$verify])" >{{trans('messages.confirmation')}}</x-accept>
