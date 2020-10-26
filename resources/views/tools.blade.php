<x-modal id="deftools_message_modal" title="&nbsp;" size="sm">
    <p class="modal-message"></p>
</x-modal>

<x-modal id="deftools_question_modal" title="&nbsp" size="sm">
    <p class="modal-message"></p>

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary modal-abort-button" data-dismiss="modal">{{ucwords(__('def-components::modals.abort'))}}</button>
        <button type="button" class="btn modal-ok-button" data-dismiss="modal">{{ucwords(__('def-components::modals.continue'))}}</button>
    </x-slot>
</x-modal>

<script type="text/javascript" src="{{ asset('js/defstudio/components/summernote-bs4.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('js/defstudio/components/tools.js') }}" defer></script>

@stack('x-scripts')

@stack('x-html')
