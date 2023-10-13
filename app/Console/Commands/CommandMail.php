<?php

namespace App\Console\Commands;

use App\Mail\SendMail;
use App\Models\Eleve;
use App\Models\Event;
use App\Models\Inscription;
use App\Models\Participant;
use App\Models\User;
use App\Notifications\EventNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CommandMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:command-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "envoyer des emails de rappel d'évènement";

    /**
     * Execute the console command.
     */
    // public function handle()
    // {
    //   $tomorrow= Carbon::now()->addDay();
    //   $events= Event::whereDate('date', $tomorrow)->first();
    //     $this->info($events);
    //   $eventsId= $events->id;
    //   $classeId= Participant::where('event_id',$eventsId)->select('classes_id')->first();
    //   $this->info($classeId);
    //   $eleves= Inscription::where('classes_id',$classeId->classes_id)->select('eleve_id')->first();
    //   $eleveId= $eleves->eleve_id;
    //   $this->info($eleveId);
    //   $email= Eleve::where('id',$eleveId)->select('email')->first();
    //   $this->info($email->email);
    //   Mail::to($email->email)->send(new SendMail());


        // $tomorrow = Carbon::now()->addDay();
        // $events = Event::whereDate('date', $tomorrow)->get();

        // foreach ($events as $event) {
        //     $this->info($event);
        //     $user = User::where('id', $event->user_id)->select('email', 'name')->first();
        //     $subject = 'Rappels d\'evenements';
        //     $user_email = $user->email;
        //     $user_name = $user->name;
        //     $this->info($user_email);
        //     $this->info($user_name);

        //     $classeId = $event->participants()->select('classes_id')->first();
        //     $this->info($classeId);
        //     $inscriptions = Inscription::where('classes_id', $classeId->classe_id)->get();
        //     $this->info($inscriptions);
        //     $id_eleve = $inscriptions->pluck('eleve_id');
        //     $this->info($id_eleve);
        //     foreach ($id_eleve as $el){
        //         $this->info($el);
        //         $eleve = Eleve::where('id', $el)->select('email', 'nom', 'prenom')->first();
        //         $this->info($eleve->email);

        //         $message = "Bonjour {$eleve->prenom} {$eleve->nom} nous tenons à vous informer de l'événement {$event->libelle} qui aura lieu demain inshaAllah.";
        //         Mail::to($eleve->email)->send(new SendMail($subject, $message));
        //     }
        //     $message = "Bonjour {$user_name} nous tenons à vous informer de l'événement {$event->libelle} que vous aviez plannifié aura lieu demain inshaAllah.";
        //     Mail::to($user_email)->send(new SendMail($subject, $message));
        // }
    // }
    public function handle()
    {
        $event=Event::find(1);
        $this->info($event);
       $eleve= Eleve::find(1);
       $this->info($eleve);
    //    $legui= date("H:i:s");
       $eleve->notify(new EventNotification($event,$eleve->nom));

    }

}
