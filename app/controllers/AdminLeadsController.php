<?php

class AdminLeadsController extends Controller
{
    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function listLeads()
    {
        $leads = Lead::orderBy('created_at', 'DESC')->get();

        return View::make('admin.leads.index')->with('leads', $leads);
    }

    public function showLead($id)
    {
        $lead = Lead::findOrFail($id);

        return View::make('admin.leads.show', [
            'lead' => $lead
        ]);
    }
}
