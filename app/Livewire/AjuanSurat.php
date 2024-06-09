<?php

namespace App\Livewire;


use App\Models\AjuanSurat as ModelsAjuanSurat;
use Livewire\Attributes\Layout;
use Livewire\Component;
use PhpOffice\PhpWord\PhpWord;
use Livewire\WithFileUploads;

class AjuanSurat extends Component
{
    use WithFileUploads;
    public $actionId;

    #[Layout('components.layouts.admin.index')] 
    public function render()
    {
        return view('livewire.admin.ajuan-surat.ajuan-surat',[
            'ajuan_surat' => ModelsAjuanSurat::paginate(10)
        ]);
    }

    public function approve($id){
        $this->actionId = $id;
        $result = ModelsAjuanSurat::where('id', $this->actionId)
                  ->update(['status' => 'Diterima']);
        if ($result) {
            return redirect('/admin/surat')->with('success', 'berhasil mengubah data');
        } else {
            return redirect('/admin/surat')->with("error", "Gagal mengubah data!");
        }
    }
    public function reject($id){
        $this->actionId = $id;
        $result = ModelsAjuanSurat::where('id', $this->actionId)
                  ->update(['status' => 'Ditolak']);
        if ($result) {
            return redirect('/admin/surat')->with('success', 'berhasil mengubah data');
        } else {
            return redirect('/admin/surat')->with("error", "Gagal mengubah data!");
        }
    }

    function sktm($id) {
        $this->actionId = $id;

        $surat = ModelsAjuanSurat::find($this->actionId);
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
        $textcenter->addText('PEMERINTAH KABUPATEN MUARO JAMBI', array('bold' => true));
        $textcenter->addTextBreak();
        $textcenter->addText('KECAMATAN JAMBI LUAR KOTA', array('bold' => true));
        $textcenter->addTextBreak();
        $textcenter->addText('DESA MENDALO DARAT', array('bold' => true));
        $textcenter->addTextBreak();
        $textcenter->addText('Alamat :Perumahan Valencia, Mendalo Darat, Kabupaten Muaro Jambi, Jambi 36657', array('size' => 8));

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
        $textRun->addText('Surat Keterangan Kurang Mampu', array('bold' => true, 'size' => 14));

        $section->addTextBreak(1); // Tambahkan baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'center'));
        $textRun->addText('Nomor ................../2023');

        $section->addTextBreak(1); // Tambahkan baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'both')); // Mengatur 'alignment' menjadi 'both' untuk justify
        $textRun->addText('Yang bertanda tangan dibawah ini Ketua RT Desa Mendalo Darat Kecamatan Jambi Luar Kota, Kabupaten Muaro Jambi menerangkan bahwa :');

        // Tambahkan tabel dengan data
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText('Nama ');
        $table->addCell(6000)->addText(': ' . $surat->nama_pengaju);
        $table->addRow();
        $table->addCell(2000)->addText('Tempat/Tgl Lahir ');
        $table->addCell(6000)->addText(': ' . "06 Mei 2023"); // Tambahkan data sesuai
        $table->addRow();
        $table->addCell(2000)->addText('Jenis Kelamin ');
        $table->addCell(6000)->addText(': '. 'Laki-laki'); // Tambahkan data sesuai
        $table->addRow();
        $table->addCell(2000)->addText('Agama ');
        $table->addCell(6000)->addText(': '. 'Agama'); // Tambahkan data sesuai
        $table->addRow();
        $table->addCell(2000)->addText('Pekerjaan ');
        $table->addCell(6000)->addText(': '. 'Ibu Rumah-Tangga'); // Tambahkan data sesuai
        $table->addRow();
        $table->addCell(2000)->addText('Alamat ' );
        $table->addCell(6000)->addText(': '. 'Mendalo Asri'); // Tambahkan data sesuai

        $section->addTextBreak(1); // Tambahkan baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'both'));
        $textRun->addText('Bahwa nama tersebut diatas sepanjang sepengetahuan kami, sampai saat ini yang bersangkutan termasuk dalam keluarga yang TIDAK MAMPU.');
        $textRun = $section->addTextRun(array('alignment' => 'both'));
        $textRun->addText('Demikianlah surat keterangan tidak mampu/miskin ini dibuat dengan sebenarnya untuk dapat digunakan sebagaimana mestinya.');
        $section->addTextBreak(2); // Tambahkan 2 baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'right'));
        $currentDate = date('d F Y'); // Format tanggal
        $textRun->addText($currentDate);

        $textRun = $section->addTextRun(array('alignment' => 'right'));
        $textRun->addText('Ketua RT');
        $section->addTextBreak(2); // Tambahkan 2 baris kosong
        $textRun = $section->addTextRun(array('alignment' => 'right'));
        $textRun->addText('M Ridwan');

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
}
