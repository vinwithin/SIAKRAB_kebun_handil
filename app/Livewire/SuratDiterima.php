<?php

namespace App\Livewire;

use App\Models\AjuanSurat;
use Livewire\Attributes\Layout;
use Livewire\Component;
use PhpOffice\PhpWord\PhpWord;


class SuratDiterima extends Component
{
    #[Layout('components.layouts.admin.index')] 
    public $actionId;


    public function render()
    {
        return view('livewire.admin.ajuan-surat.surat-diterima', [
            'surat_diterima' => AjuanSurat::where('status', 'Diterima')->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
    
    public function reject($id){
        $this->actionId = $id;
        $result = AjuanSurat::where('id', $this->actionId)
                  ->update(['status' => 'Ditolak']);
        if ($result) {
            return redirect('/admin/surat/ditolak')->with('success', 'berhasil mengubah data');
        } else {
            return redirect('/admin/surat')->with("error", "Gagal mengubah data!");
        }
    }

    function sktm($id) {
        $this->actionId = $id;

        $surat = AjuanSurat::find($this->actionId);
        // Inisialisasi PhpWord
        $phpWord = new PhpWord();

        // Atur font secara global untuk seluruh dokumen
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(11);
        $section = $phpWord->addSection();

        // Buat header
        $table = $section->addTable();
        $table->addRow();
        $cellLogo = $table->addCell(2000); // Lebar kolom logo (misalnya: 2000 twip)
        // $cellLogo->addImage('image/8.png', array('width' => 40, 'height' => 50)); // Ganti dengan path file logo yang sesuai
        $cellText = $table->addCell(20000);
        $textcenter = $cellText->addTextRun(array('alignment' => 'center'));
        $textcenter->addText('PEMERINTAH KOTA JAMBI', array('bold' => true));
        $textcenter->addTextBreak();
        $textcenter->addText('KECAMATAN JELUTUNG', array('bold' => true));
        $textcenter->addTextBreak();
        $textcenter->addText('KELURAHAN KEBUN HANDIL', array('bold' => true));
        $textcenter->addTextBreak();
        $textcenter->addText('Alamat :Jalan DI Panjaitan NO.51 RT.18 JAMBI - 36137', array('size' => 8));

        // Tambahkan garis pembatas dengan isi surat di bawah kop surat
        $section->addLine(array(
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(19.5), // Sesuaikan dengan lebar kertas yang Anda gunakan
            'height' => 0, // Tinggi garis (0 untuk membuat garis horizontal)
            'positioning' => 'absolute',
            'marginLeft' => 0, // Margin kiri dalam satuan Twip
            'marginTop' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(1), // Margin atas dalam satuan Twip
        ));

        // Buat halaman
        $section->addTextBreak(1); // Tambahkan baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'center'));
        $textRun->addText('SURAT KETERANGAN TIDAK MAMPU', array('bold' => true, 'size' => 14));

        $section->addTextBreak(1); // Tambahkan baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'center'));
        $textRun->addText('Nomor ........................../2023');

        $section->addTextBreak(1); // Tambahkan baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'both')); // Mengatur 'alignment' menjadi 'both' untuk justify
        $textRun->addText('Yang bertanda tangan dibawah ini Lurah Kebun Handil Kecamatan Jelutung Kota Jambi dengan ini menerangkan bahwa :');

        // Tambahkan tabel dengan data
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText('Nama ');
        $table->addCell(6000)->addText(': ' . $surat->nama_pengaju);
        $table->addRow();
        $table->addCell(2000)->addText('Tempat/Tgl Lahir ');
        $table->addCell(6000)->addText(': ' . $surat->ttl); // Tambahkan data sesuai
        $table->addRow();
        $table->addCell(2000)->addText('Jenis Kelamin ');
        $table->addCell(6000)->addText(': '. $surat->jenis_kelamin); // Tambahkan data sesuai
        $table->addRow();
        $table->addCell(2000)->addText('Agama ');
        $table->addCell(6000)->addText(': '. $surat->agama); // Tambahkan data sesuai
        $table->addRow();
        $table->addCell(2000)->addText('Pekerjaan ');
        $table->addCell(6000)->addText(': '. $surat->pekerjaan); // Tambahkan data sesuai
        $table->addRow();
        $table->addCell(2000)->addText('Alamat ' );
        $table->addCell(6000)->addText(': '. $surat->Alamat); // Tambahkan data sesuai

        $section->addTextBreak(1); // Tambahkan baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'both'));
        $textRun->addText('Bahwa nama tersebut diatas adalah penduduk RT.22 Kelurahan Kebun Handil Kecamatan Jelutung Kota Jambi yang memenuhi syarat sebagai masyarakat miskin dan tidak mampu.');
        $textRun = $section->addTextRun(array('alignment' => 'both'));
        $textRun->addText('Demikianlah surat keterangan tidak mampu/miskin ini dibuat dengan sebenarnya untuk dapat digunakan sebagaimana mestinya.');
        $section->addTextBreak(2); // Tambahkan 2 baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'right'));
        $currentDate = date('d F Y'); // Format tanggal
        $textRun->addText('Jambi,' . $currentDate);

        $textRun = $section->addTextRun(array('alignment' => 'right'));
        $textRun->addText('LURAH KEBUN HANDIL');
        $textRun->addText('KEC. JELUTUNG');
        $section->addTextBreak(2); // Tambahkan 2 baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'right'));
        $textRun->addText('AMRAN, SE');
        $textRun->addText('NIP. 197205142007011005');

        // Simpan dokumen ke dalam file sementara
        $filename = 'surat_keterangan.docx';
        $tempFilePath = sys_get_temp_dir() . '/' . $filename;
        $phpWord->save($tempFilePath, 'Word2007');
        $phpWord->save($filename);

        if (file_exists($tempFilePath)) {
            return response()->download($tempFilePath, $filename)->deleteFileAfterSend(true);
        } else {
            return response()->json(['message' => 'File not found.'], 404);
        }
    
    }
    function domisili($id) {
        $this->actionId = $id;
        $currentDate = date('d F Y'); // Format tanggal


        $surat = AjuanSurat::find($this->actionId);
        // Inisialisasi PhpWord
        $phpWord = new PhpWord();

        // Atur font secara global untuk seluruh dokumen
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(11);
        $section = $phpWord->addSection();

        // Buat header
        $table = $section->addTable();
        $table->addRow();
        $cellLogo = $table->addCell(2000); // Lebar kolom logo (misalnya: 2000 twip)
        // $cellLogo->addImage('image/8.png', array('width' => 40, 'height' => 50)); // Ganti dengan path file logo yang sesuai
        $cellText = $table->addCell(20000);
        $textcenter = $cellText->addTextRun(array('alignment' => 'center'));
        $textcenter->addText('PEMERINTAH KOTA JAMBI', array('bold' => true));
        $textcenter->addTextBreak();
        $textcenter->addText('KECAMATAN JELUTUNG', array('bold' => true));
        $textcenter->addTextBreak();
        $textcenter->addText('KELURAHAN KEBUN HANDIL', array('bold' => true));
        $textcenter->addTextBreak();
        $textcenter->addText('Alamat :Jalan DI Panjaitan NO.51 RT.18 JAMBI - 36137', array('size' => 8));

        // Tambahkan garis pembatas dengan isi surat di bawah kop surat
        $section->addLine(array(
            'width' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(19.5), // Sesuaikan dengan lebar kertas yang Anda gunakan
            'height' => 0, // Tinggi garis (0 untuk membuat garis horizontal)
            'positioning' => 'absolute',
            'marginLeft' => 0, // Margin kiri dalam satuan Twip
            'marginTop' => \PhpOffice\PhpWord\Shared\Converter::cmToTwip(1), // Margin atas dalam satuan Twip
        ));

        // Buat halaman
        $section->addTextBreak(1); // Tambahkan baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'center'));
        $textRun->addText('SURAT KETERANGAN DOMISILI', array('bold' => true, 'size' => 14));

        $section->addTextBreak(1); // Tambahkan baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'center'));
        $textRun->addText('Nomor ........................../2023');

        $section->addTextBreak(1); // Tambahkan baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'both')); // Mengatur 'alignment' menjadi 'both' untuk justify
        $textRun->addText('Yang bertanda tangan dibawah ini :');
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText('Nama ');
        $table->addCell(6000)->addText(': ' . 'AMRAN, SE');
        $table->addRow();
        $table->addCell(2000)->addText('Jawaban ');
        $table->addCell(6000)->addText(': ' . "Lurah Kebun Handil Kecamatan Jelutung Kota Jambi"); 

        // Tambahkan tabel dengan data
        $section->addTextBreak(1); // Tambahkan baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'both')); // Mengatur 'alignment' menjadi 'both' untuk justify
        $textRun->addText('Dengan ini menerangkan bahwa :');
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText('Nama ');
        $table->addCell(6000)->addText(': ' . $surat->nama_pengaju);
        $table->addRow();
        $table->addCell(2000)->addText('Tempat/Tgl Lahir ');
        $table->addCell(6000)->addText(': ' . $surat->ttl); // Tambahkan data sesuai
        $table->addRow();
        $table->addCell(2000)->addText('Jenis Kelamin ');
        $table->addCell(6000)->addText(': '. $surat->jenis_kelamin); // Tambahkan data sesuai
        $table->addRow();
        $table->addCell(2000)->addText('Agama ');
        $table->addCell(6000)->addText(': '. $surat->agama); // Tambahkan data sesuai
        $table->addRow();
        $table->addCell(2000)->addText('Pekerjaan ');
        $table->addCell(6000)->addText(': '. $surat->pekerjaan); // Tambahkan data sesuai
        $table->addRow();// Tambahkan data sesuai
        $table->addCell(2000)->addText('Alamat ' );
        $table->addCell(6000)->addText(': '. $surat->Alamat); // Tambahkan data sesuai

        $section->addTextBreak(1); // Tambahkan baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'both'));
        $textRun->addText('Berdasarkan keterangan Ketua RT.11 Nomor : ........ tanggal '. $currentDate . ' menerangkan bahwa yang bersangkutan benar Berdomisili/Bertempat tinggal di Jln. Sumatera RT.11 Kelurahan Kebun Handil Kecamatan Jelutung Kota Jambi.');
        $section->addTextBreak(1); // Tambahkan baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'both'));
        $textRun->addText('Demikianlah surat surat keterangan ini dibuat untuk dipergunakan seperlunya.');
        $section->addTextBreak(2); // Tambahkan 2 baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'right'));
        $textRun->addText('Jambi,' . $currentDate);

        $textRun = $section->addTextRun(array('alignment' => 'right'));
        $textRun->addText('LURAH KEBUN HANDIL');
        $textRun->addText('KEC. JELUTUNG');
        $section->addTextBreak(2); // Tambahkan 2 baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'right'));
        $textRun->addText('AMRAN, SE');
        $textRun->addText('NIP. 197205142007011005');

        // Simpan dokumen ke dalam file sementara
        $filename = 'surat_keterangan.docx';
        $tempFilePath = sys_get_temp_dir() . '/' . $filename;
        $phpWord->save($tempFilePath, 'Word2007');
        $phpWord->save($filename);

        if (file_exists($tempFilePath)) {
            return response()->download($tempFilePath, $filename)->deleteFileAfterSend(true);
        } else {
            return response()->json(['message' => 'File not found.'], 404);
        }
    
    }
    public function destroy($id){
        AjuanSurat::where('id', $id )->delete(); 
        return redirect('/admin/surat')->with('success', 'Aduan Berhasil Dihapus!');
    }
    
}
