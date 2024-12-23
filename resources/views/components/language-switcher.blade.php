<div class="switch">
    <input id="language-toggle" class="check-toggle check-toggle-round-flat" type="checkbox"
        {{ App::getLocale() == 'ar' ? 'checked' : '' }}>
    <label for="language-toggle"></label>
    <span class="on">Eng</span>
    <span class="off">عربي</span>
</div>
<script>
    document.getElementById('language-toggle').addEventListener('change', function() {
        let currentLang = "{{ App::getLocale() }}";
        let newLang = this.checked ? 'ar' : 'en';
        let currentUrl = window.location.href;

        if (currentUrl.includes('/' + currentLang + '/')) {
            window.location.href = currentUrl.replace('/' + currentLang + '/', '/' + newLang + '/');
        } else {
            window.location.href = "{{ url('archive') }}/" + newLang;
        }
    });
</script>


<style>
    .switch {
        position: relative;
        display: inline-block;
        margin: 0 5px;
    }

    .switch>span {
        position: absolute;
        top: 14px;
        pointer-events: none;
        font-family: 'Helvetica', Arial, sans-serif;
        font-weight: bold;
        font-size: 10px;
        text-transform: uppercase;
        text-shadow: 0 1px 0 rgba(0, 0, 0, .06);
        width: 50%;
        text-align: center;
    }

    input.check-toggle-round-flat:checked~.off {
        color: #823F42;
    }

    input.check-toggle-round-flat:checked~.on {
        color: #fff;
    }

    .switch>span.on {
        left: 0;
        padding-left: 2px;
        color: #823F42;
    }

    .switch>span.off {
        right: 0;
        padding-right: 4px;
        color: #fff;
    }

    .check-toggle {
        position: absolute;
        margin-left: -9999px;
        visibility: hidden;
    }

    .check-toggle+label {
        display: block;
        position: relative;
        cursor: pointer;
        outline: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        padding: 6px;
        width: 100px;
        height: 40px;
        background-color: #823F42;
        border-radius: 60px;
    }

    .check-toggle+label:before,
    .check-toggle+label:after {
        display: block;
        position: absolute;
        content: "";
    }

    .check-toggle+label:before {
        top: 2px;
        left: 2px;
        bottom: 2px;
        right: 2px;
        background-color: #823F42;
        border-radius: 60px;
    }

    .check-toggle+label:after {
        top: 4px;
        left: 4px;
        bottom: 4px;
        width: 50px;
        background-color: #fff;
        border-radius: 52px;
        transition: margin 0.2s;
    }

    input.check-toggle-round-flat:checked+label:after {
        margin-left: 44px;
    }
</style>
