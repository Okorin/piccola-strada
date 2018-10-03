@extends('layouts.master')

@section('title', 'Kontakt')
@section('page-title', 'Piccola Strada Lingen')
@section('page-description')
Pizzeria &amp; Kebaphaus
an der Elisabethstraße 1 &middot; 49808 Lingen (Ems)
@endsection
@section('content')
<div class="row">
    <div class="col">
        <table class="table table-light">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th>Öffnungszeit</th>
                    <th>Lieferzeit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Montag</th>
                    <td>11:00 - 22:00</td>
                    <td>17:00 - 22:00</td>
                </tr>
                <tr>
                    <th scope="row">Dienstag</th>
                    <td>11:00 - 22:00</td>
                    <td>17:00 - 22:00</td>
                </tr>
                <tr>
                    <th scope="row">Mittwoch</th>
                    <td>11:00 - 22:00</td>
                    <td>17:00 - 22:00</td>
                </tr>
                <tr>
                    <th scope="row">Donnerstag</th>
                    <td>11:00 - 22:00</td>
                    <td>17:00 - 22:00</td>
                </tr>
                <tr>
                    <th scope="row">Freitag</th>
                    <td>11:00 - 22:00</td>
                    <td>17:00 - 22:00</td>
                </tr>
                <tr>
                    <th scope="row">Samstag</th>
                    <td>11:00 - 22:00</td>
                    <td>17:00 - 22:00</td>
                </tr>
                <tr>
                    <th scope="row">Sonntag</th>
                    <td>11:00 - 22:00</td>
                    <td>17:00 - 22:00</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col">
        <table class="table table-light">
            <thead class="thead-dark">
                <tr>
                    <th>Kontaktdaten</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <address>
                            Piccola Strada<br />
                            Elisabethstraße 1<br />
                            49808 Lingen (Ems)<br />
                            <span itemprop="telephone"><a href="tel:+49059159156">0591 / 59156</a></span>
                        </address>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection