<?php

namespace App\Policies;

use App\Models\Invoice;
use App\Models\Masyarakat;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return mixed
     */
    public function viewAny(Masyarakat $masyarakat)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @param  \App\Models\Invoice  $invoice
     * @return mixed
     */
    public function view(Masyarakat $masyarakat, Invoice $invoice)
    {
        return $invoice->lelang->user->id_user === $masyarakat->id_user;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return mixed
     */
    public function create(Masyarakat $masyarakat)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @param  \App\Models\Invoice  $invoice
     * @return mixed
     */
    public function update(Masyarakat $masyarakat, Invoice $invoice)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @param  \App\Models\Invoice  $invoice
     * @return mixed
     */
    public function delete(Masyarakat $masyarakat, Invoice $invoice)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @param  \App\Models\Invoice  $invoice
     * @return mixed
     */
    public function restore(Masyarakat $masyarakat, Invoice $invoice)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @param  \App\Models\Invoice  $invoice
     * @return mixed
     */
    public function forceDelete(Masyarakat $masyarakat, Invoice $invoice)
    {
        //
    }
}
