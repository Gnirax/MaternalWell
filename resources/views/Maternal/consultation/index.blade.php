 @extends('Maternal.layout')
 @section('content')
     <div class="container card shadow-lg">
         <h2 style="text-align: center">CONSULTATIONS</h2>
         <ul class="nav nav-tabs d-flex justify-content-center">
             <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#past">Past Consultations</a></li>
             <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#today">Today's Consultations</a></li>
             <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#appointment">Appointments</a></li>
         </ul>
         <div class="tab-content">
             <div id="past" class="tab-pane fade">
                 <table class="table table-hover">
                     <tr>
                         <th>DATE</th>
                         <th>PATIENT</th>
                         <th>TICKET NO.</th>
                         <th colspan="3">ACTION</th>
                     </tr>
                     @forelse ($pastconsultations as $consultation)
                         <tr>
                             <td>{{ $consultation->date }}</td>
                             <td>{{ $consultation->associated }}</td>
                             <td>{{ $consultation->ticket_number }}</td>
                             <td><a href="{{ route('consultations.show', $consultation->id) }}"><i
                                         class="fas fa-user-circle"></a></i></td>
                             @if (Auth::user()->role == 'Admin')
                                 <td><a href="{{ route('consultations.edit', $consultation->id) }}"><i
                                             class="fas fa-pencil-alt"></a></i></td>
                                 <form action="{{ route('consultations.delete', $consultation->id) }}" method="POST">
                                     @csrf
                                     @method('DELETE')
                                     <td><a id="del" href="{{ route('consultations.delete', $consultation->id) }}"><i
                                                 class="fas fa-trash-alt"></i></a></td>
                                 </form>
                             @endif
                         </tr>
                     @empty
                         <tr>
                             <td colspan="6">No consultations</td>
                         </tr>
                     @endforelse
                 </table>
             </div>
             <div id="today" class="tab-pane fade">
                 <table class="table table-hover">
                     <tr>
                         <th>DATE</th>
                         <th>PATIENT</th>
                         <th>TICKET NO.</th>
                         <th colspan="3">ACTION</th>
                     </tr>
                     @forelse ($todayconsultations as $consultation)
                         <tr>
                             <td>{{ $consultation->date }}</td>
                             <td>{{ $consultation->associated }}</td>
                             <td>{{ $consultation->ticket_number }}</td>
                             <td><a href="{{ route('consultations.show', $consultation->id) }}"><i
                                         class="fas fa-user-circle"></a></i></td>
                             @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Nurse')
                                 <td><a href="{{ route('consultations.edit', $consultation->id) }}"><i
                                             class="fas fa-pencil-alt"></a></i></td>
                                 @if (Auth::user()->role == 'Admin')
                                     <form action="{{ route('consultations.delete', $consultation->id) }}" method="POST">
                                         @csrf
                                         @method('DELETE')
                                         <td><a id="del"
                                                 href="{{ route('consultations.delete', $consultation->id) }}"><i
                                                     class="fas fa-trash-alt"></i></a></td>
                                     </form>
                                 @endif
                             @endif
                         </tr>
                     @empty
                         <tr>
                             <td colspan="6">No consultations</td>
                         </tr>
                     @endforelse
                 </table>
             </div>
             <div id="appointment" class="tab-pane fade">
                 <table class="table table-hover">
                     <tr>
                         <th>DATE</th>
                         <th>PATIENT</th>
                         <th>TICKET NO.</th>
                         <th colspan="3">ACTION</th>
                     </tr>
                     @forelse ($appointments as $consultation)
                         <tr>
                             <td>{{ $consultation->date }}</td>
                             <td>{{ $consultation->associated }}</td>
                             <td>{{ $consultation->ticket_number }}</td>
                             <td><a href="{{ route('consultations.show', $consultation->id) }}"><i
                                         class="fas fa-user-circle"></a></i></td>
                             @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Nurse')
                                 <td><a href="{{ route('consultations.edit', $consultation->id) }}"><i
                                             class="fas fa-pencil-alt"></a></i></td>
                                 @if (Auth::user()->role == 'Admin')
                                     <form action="{{ route('consultations.delete', $consultation->id) }}" method="POST">
                                         @csrf
                                         @method('DELETE')
                                         <td><a id="del"
                                                 href="{{ route('consultations.delete', $consultation->id) }}"><i
                                                     class="fas fa-trash-alt"></i></a></td>
                                     </form>
                                 @endif
                             @endif
                         </tr>
                     @empty
                         <tr>
                             <td colspan="6">No consultations</td>
                         </tr>
                     @endforelse
                 </table>
             </div>
         </div>
     </div>
 @endsection
