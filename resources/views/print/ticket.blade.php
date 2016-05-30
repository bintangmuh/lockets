<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Print Ticket - {{ $ticket->type->event->name }}</title>
  </head>
  <body>
    <table border="1">
      <tr>
        <td colspan="4">
          Lockets
        </td>
      </tr>
      <tr>
        <td>
          username
        </td>
        <td>
          {{ $ticket->user->username}}
        </td>
        <td>
          {{ $ticket->type->event->name }}
        </td>
        <td>
          {{ $ticket->type->name }}
        </td>
      </tr>
      <tr>
        <td>
          Name
        </td>
        <td>
          {{ $ticket->user->name}}
        </td>
        <td>
          {{ $ticket->type->event->place }}
        </td>
        <td>

        </td>
      </tr>
      <tr>
        <td>

        </td>
        <td>

        </td>
        <td>
          {{ $ticket->type->event->timeheld->format('d M Y') }}
        </td>
        <td>

        </td>
      </tr>
      <tr>
        <td>

        </td>
        <td>

        </td>
        <td>
          {{ $ticket->type->event->timeheld->format('H:i') }}
        </td>
        <td>

        </td>
      </tr>
      <tr>
        <td>

        </td>
        <td>

        </td>
        <td>
          Rp.{{ $ticket->type->price}}
        </td>
        <td>

        </td>
      </tr>
    </table>
  </body>
</html>
