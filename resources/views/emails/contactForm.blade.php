@extends('emails.templates.default')

@section('content')
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0"
        style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #ffb496; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
        <tr>
            <td align="center" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                <table class="content" width="100%" cellpadding="0" cellspacing="0"
                    style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                    <tr>
                        <td class="header"
                            style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 25px 0; text-align: center;">
                            <a href="https://dinnerwalks.nl/"
                                style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #ffffff; font-size: 19px; font-weight: bold; text-decoration: none; text-shadow: 0 1px 0 #898989;">
                                Dinnerwalks
                            </a>
                        </td>
                    </tr>
                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0"
                            style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #ffffff; border-bottom: 1px solid #ffffff; border-top: 1px solid #ffffff; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                                style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #fafafa; margin: 0 auto; padding: 0; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell"
                                        style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 35px;">
                                        <h1
                                            style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #373737; font-size: 19px; font-weight: bold; margin-top: 0; text-align: left;">
                                            Contactformulier is ingevuld</h1>
                                        <h3
                                            style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #373737; font-size: 14px; font-weight: bold; margin-top: 0; text-align: left;">
                                            Naam</h3>
                                        <p
                                            style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #888888; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                                            {{ $naam }}
                                        </p>
                                        <h3
                                            style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #373737; font-size: 14px; font-weight: bold; margin-top: 0; text-align: left;">
                                            E-mail</h3>
                                        <p
                                            style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #888888; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                                            {{ $email }}
                                        </p>
                                        <h3
                                            style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #373737; font-size: 14px; font-weight: bold; margin-top: 0; text-align: left;">
                                            Bericht</h3>
                                        <p
                                            style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #888888; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                                            {{ $bericht }}
                                        </p>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                            <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0"
                                style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 0 auto; padding: 0; text-align: center; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
                                <tr>
                                    <td class="content-cell" align="center"
                                        style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 35px;">
                                        <p
                                            style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; line-height: 1.5em; margin-top: 0; color: #ffffff; font-size: 12px; text-align: center;">
                                            © 2021 Dinnerwalks. Alle rechten voorbehouden.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endsection
