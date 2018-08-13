<?php

namespace App\Http\Controllers;

use App\Entities\Role;
use App\Entities\User;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->entityManager->find(User::class, 1);
        if (empty($user)) {
            $user = new User();
            $user->setName('Test Subject');
            $user->setEmail('test@project.ai');
            $user->setPassword(\Hash::make('smurfen'));
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        // Create the Administrator role
        // if doesn't exist yet.
        if (!$user->hasRole('Administrator')) {
            $roleResource = new Role();
            $roleResource->setName('Administrator');
            $this->entityManager->persist($roleResource);
        }

        if (!$user->hasRole('Administrator')) {
            $user->addRole($roleResource);
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

//        dd($user->getRoles()->toArray());
        return view('welcome', [
            'name' => $user->getName(),
            'roles' => $user->getRoles()->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
