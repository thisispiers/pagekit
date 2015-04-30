<div v-component="v-mail" inline-template>

    <div class="uk-margin uk-flex uk-flex-space-between uk-flex-wrap" data-uk-margin>
        <div data-uk-margin>

            <h2 class="uk-margin-remove">{{ 'Email' | trans }}</h2>

        </div>
        <div data-uk-margin>

            <button class="uk-button uk-button-primary" type="submit">{{ 'Save' | trans }}</button>

        </div>
    </div>

    <div class="uk-form-row">
        <label for="form-emailaddress" class="uk-form-label">{{ 'From Email' | trans }}</label>
        <div class="uk-form-controls">
            <input id="form-emailaddress" class="uk-form-width-large" type="text" v-model="option['system/mail'].from_address">
        </div>
    </div>

    <div class="uk-form-row">
        <label for="form-fromname" class="uk-form-label">{{ 'From Name' | trans }}</label>
        <div class="uk-form-controls">
            <input id="form-fromname" class="uk-form-width-large" type="text" v-model="option['system/mail'].from_name">
        </div>
    </div>

    <div class="uk-form-row">
        <label for="form-mailer" class="uk-form-label">{{ 'Mailer' | trans }}</label>
        <div class="uk-form-controls">
            <select id="form-mailer" class="uk-form-width-large" v-model="option['system/mail'].driver">
                <option value="mail">{{ 'PHP Mailer' | trans }}</option>
                <option value="smtp">{{ 'SMTP Mailer' | trans }}</option>
            </select>
        </div>
    </div>

    <div class="uk-form-row" v-show="'smtp' == option['system/mail'].driver">

        <div class="uk-form-row">
            <label for="form-smtpport" class="uk-form-label">{{ 'SMTP Port' | trans }}</label>
            <div class="uk-form-controls">
                <input id="form-smtpport" class="uk-form-width-large" type="text" v-model="option['system/mail'].port">
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-smtphost" class="uk-form-label">{{ 'SMTP Host' | trans }}</label>
            <div class="uk-form-controls">
                <input id="form-smtphost" class="uk-form-width-large" type="text" v-model="option['system/mail'].host">
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-smtpuser" class="uk-form-label">{{ 'SMTP User' | trans }}</label>
            <div class="uk-form-controls">
                <input id="form-smtpuser" class="uk-form-width-large" type="text" v-model="option['system/mail'].username">
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-smtppassword" class="uk-form-label">{{ 'SMTP Password' | trans }}</label>
            <div class="uk-form-controls js-password">
                <div class="uk-form-password">
                    <input id="form-smtppassword" class="uk-form-width-large" type="password" v-model="option['system/mail'].password">
                    <a class="uk-form-password-toggle" data-uk-form-password>{{ 'Show' | trans }}</a>
                </div>
            </div>
        </div>

        <div class="uk-form-row">
            <label for="form-smtpencryption" class="uk-form-label">{{ 'SMTP Encryption' | trans }}</label>
            <div class="uk-form-controls">
                <select id="form-smtpencryption" class="uk-form-width-large" v-model="option['system/mail'].encryption">
                    <option value="">{{ 'None' | trans }}</option>
                    <option value="ssl" v-attr="disabled: !ssl">{{ 'SSL' | trans }}</option>
                    <option value="tls" v-attr="disabled: !ssl">{{ 'TLS' | trans }}</option>
                </select>
                <p class="uk-form-help-block" v-if="!ssl">{{ 'Please enable the PHP Open SSL extension.' | trans }}</p>
            </div>
        </div>

    </div>

    <div class="uk-form-row">
        <div class="uk-form-controls">
            <button class="uk-button" type="button" v-on="click: test('smtp')" v-show="'smtp' == option['system/mail'].driver">{{ 'Check Connection' | trans }}</button>
            <button class="uk-button" type="button" v-on="click: test('email')">{{ 'Send Test Email' | trans }}</button>
        </div>
    </div>

</div>
