<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageCreateRequest;
use App\Repositories\PackageCreateRepo;
use Illuminate\Http\Request;

class PackageCreateController extends Controller
{
  protected PackageCreateRepo $pkgCreateRepo;

  public function __construct(PackageCreateRepo $pkgCreateRepo) 
  {
    $this->pkgCreateRepo = $pkgCreateRepo;
  }

  public function view_packages() 
  {
    $this->checkSession();
    
    $packages = $this->pkgCreateRepo->getAllPacakges();

    return view('package.view_packages', compact('packages'));
  }

  public function edit_package(int $id) 
  {
    $this->checkSession();

    $package = $this->pkgCreateRepo->getPackageById($id);

    if(!isset($package)) {
      return redirect()->back();
    }

    $branches = $this->pkgCreateRepo->getBranches();
    $branch_theaters = $this->pkgCreateRepo->getTheatreByBranch($package->branch->id);
    $decorations = $this->pkgCreateRepo->getDecorations();

    //$this->printAndExit($decorations);

    return view('package.edit_package', compact('package', 'branches', 'branch_theaters', 'decorations'));
  }

  public function update_package(PackageCreateRequest $request) 
  {
    $this->checkSession();

    $package_id = $request->package_id;
    $data = $request->except('package_id', '_token');
    
    $paymentScreenshotPath = NULL;
    
    if ($request->hasFile('payment_screen_shot')) {
        
      $file = $request->file('payment_screen_shot');
      $filePrefix =   "test1_";
      $uploadPath = '' ;
    
      $fileName = 'test1.png';
      $filePath = $file->storeAs(public_path("assets/img/addon"), $fileName, 'public');
      
      //$filePath = $file->storeAs($this->getUploadPath(), $fileName);
      //$filePath = $file->store($this->getUploadPath(), 'public');
      $paymentScreenshotPath = $filePath; // asset('storage/' . $filePath);
    }
    
    $this->pkgCreateRepo->updatePackaage($package_id, $data);

    return redirect()->route('admin.package.view')->with('success', 'Package Updated Successfully');
  } 

  private function checkSession() 
  {
    if (!$this->isSessionExist()) {
      return redirect()->route('index');
    }
  }

  private function isSessionExist() 
  {
    $sortedBranchIds = session('branch_ids', []);
    if($sortedBranchIds == null){
        return false;
    }
    return true;
  }

  private function printAndExit($data)
  {
    echo json_encode($data);
    exit;
  }
}