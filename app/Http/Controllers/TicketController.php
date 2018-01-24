<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ticket;
use App\log_updates;

class TicketController extends Controller
{
    function createticket(Request $request){
    	$this->validate($request, [
    		'ticket_subject'=>'required',
    		'ticket_desc'=>'required',
    		'ticket_prio'=>'required'
    	]);
    	$tickets = new ticket;
    	$tickets->subject = $request->input('ticket_subject');
    	$tickets->description = $request->input('ticket_desc');
    	$tickets->priority = $request->input('ticket_prio');
    	$tickets->status = "new_ticket";
    	$tickets->save();

    	echo $this->createtable();
    }

    function createtable(){
    	$str = "";
    	$str.= '<table style="width:100%">';
    	$str.= '<tr>
                <th><i class="fa fa-check" aria-hidden="true"></i></th>
                <th>Subject</th> 
                <th>Requester</th>
                <th>Updated</th> 
                <th>Priority  </th>
              </tr>';
    	$tickets = ticket::All();
    	if(!empty($tickets)){
    		foreach ($tickets as $ticket) {
    			$str.= '<tr>
                <td><i class="fa fa-check" aria-hidden="true"></i></td>
                <td><a href="#">'.$ticket->subject.'</a></td> 
                <td>'.$ticket->description.'</td>
                <td>'.$ticket->updated_at.'</td>
                <td><div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">'.$ticket->priority.'(Current)
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          	<li><a href="#">Normal</a></li>
                          	<li><a href="#">High</a></li>
                          	<li><a href="#">Highest</a></li>
                        </ul>
                      </div>
                </td>
              </tr>';
    		}
    	}
    	$str.= '</table>';
    	return $str;
    }

    function getticket(){
    	echo $this->createtable();
    }

    function gettotalhrticket(){
    	$totalhrs = 0;
    	$logs = log_updates::All();
    	if(!empty($logs)){
    		foreach($logs as $log){
    			$totalhrs += $log->hours;
    		}
    	}
    	echo $totalhrs."Hrs";
    }
              
    function gettotalinticket(){
    	$totalin = 0;
    	$logs = log_updates::All();
    	if(!empty($logs)){
    		foreach($logs as $log){
    			$totalin += $log->total;
    		}
    	}
    	echo "$".$totalin;
    }
    function getlogticket(){
    	$listslog = "";
    	$listslog.= '<table style="width:100%">';
    	$listslog.= '<tr>
		                <th>Date</th>
		                <th>Hours</th> 
		                <th>Activity</th>
		                <th>Total</th>
		              </tr>';
    	$logs = log_updates::All();
    	if(!empty($logs)){
    		foreach($logs as $log){
    			$listslog.= '<tr>
                <td>'.$log->created_at.'</td> 
                <td>'.$log->hours.'</td>
                <td><a href="#'.$log->log.'">View</a></td>
                <td>'.$log->total.'</td>
              </tr>';
    		}
    	}
    	echo $listslog;
    }
}
