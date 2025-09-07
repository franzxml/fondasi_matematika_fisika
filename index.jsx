import React, { useMemo, useState } from "react";
import { Card, CardContent } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Select, SelectTrigger, SelectContent, SelectItem, SelectValue } from "@/components/ui/select";
import { Badge } from "@/components/ui/badge";
import { Check, RotateCcw, Lightbulb, Eye, EyeOff, Sparkles } from "lucide-react";

function randInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function shuffle(arr) {
  return [...arr].sort(() => Math.random() - 0.5);
}

function withSign(n) {
  return n >= 0 ? `+ ${n}` : `- ${Math.abs(n)}`;
}

function genType1() {
  const a = randInt(-9, 9);
  let b = randInt(-9, 9);
  while (b === a) b = randInt(-9, 9); 
  const x = b - a;
  const eq = `x ${withSign(a)} = ${b}`;
  const steps = [
    `Kurangi ${a >= 0 ? a : Math.abs(a)} di kedua sisi: x = ${b} ${a >= 0 ? "-" : "+"} ${Math.abs(a)}`,
    `Hitung: x = ${x}`,
  ];
  return { eq, steps, solution: x, type: "x + a = b" };
}

function genType2() {
  const k = shuffle([2, 3, 4, 5, -2, -3])[0];
  const x = randInt(-9, 9);
  const b = k * x;
  const eq = `${k}x = ${b}`;
  const steps = [
    `Bagi kedua sisi dengan ${Math.abs(k)}: x = ${b} / ${k}`,
    `Hitung: x = ${b / k}`,
  ];
  return { eq, steps, solution: x, type: "kx = b" };
}

function genType3() {
  const k = shuffle([2, 3, 4, -2, -3])[0];
  const x = randInt(-8, 8);
  const a = randInt(-9, 9);
  const b = k * x + a;
  const eq = `${k}x ${withSign(a)} = ${b}`;
  const steps = [
    `Pindahkan konstanta: ${k}x = ${b} ${a >= 0 ? "-" : "+"} ${Math.abs(a)}`,
    `Sederhanakan: ${k}x = ${b - a}`,
    `Bagi ${Math.abs(k)} di kedua sisi: x = ${(b - a)} / ${k}`,
    `Hitung: x = ${(b - a) / k}`,
  ];
  return { eq, steps, solution: x, type: "kx + a = b" };
}

function genType4() {
  const a = shuffle([2, 3, 4, 5, -2, -3])[0];
  let c = shuffle([0, 1, 2, -1, -2, 3])[0];
  if (c === a) c = a + 1; 
  const x = randInt(-6, 6);
  const b = randInt(-9, 9);
  const d = a * x + b - c * x; 
  const eq = `${a}x ${withSign(b)} = ${c}x ${withSign(d)}`;
  const steps = [
    `Kumpulkan x: ${a}x - ${c}x ${withSign(b)} = ${d}`,
    `${a - c}x ${withSign(b)} = ${d}`,
    `Pindahkan konstanta: ${(a - c)}x = ${d} ${b >= 0 ? "-" : "+"} ${Math.abs(b)}`,
    `Sederhanakan: ${(a - c)}x = ${d - b}`,
    `Bagi ${Math.abs(a - c)}: x = ${(d - b)} / ${(a - c)}`,
    `Hitung: x = ${(d - b) / (a - c)}`,
  ];
  return { eq, steps, solution: x, type: "ax + b = cx + d" };
}

function genType5() {
  const p = shuffle([2, 3, -2])[0];
  const q = shuffle([1, 2, 3])[0];
  const r = randInt(-5, 5);
  const s = randInt(-6, 6);
  const t = shuffle([0, 1, 2, 3, -1, -2])[0];
  const x = randInt(-5, 5);
  const u = p * (q * x + r) + s - t * x;
  const leftExpandedA = p * q;
  const leftExpandedB = p * r + s;
  const eq = `${p}(${q}x ${withSign(r)}) ${withSign(s)} = ${t}x ${withSign(u)}`;
  const steps = [
    `Distribusi: ${p}·${q}x ${withSign(p * r)} ${withSign(s)} = ${t}x ${withSign(u)}`,
    `Gabungkan: ${leftExpandedA}x ${withSign(leftExpandedB)} = ${t}x ${withSign(u)}`,
    `Kumpulkan x ke kiri: (${leftExpandedA} - ${t})x ${withSign(leftExpandedB)} = ${u}`,
    `${leftExpandedA - t}x ${withSign(leftExpandedB)} = ${u}`,
    `Pindahkan konstanta: ${(leftExpandedA - t)}x = ${u} ${leftExpandedB >= 0 ? "-" : "+"} ${Math.abs(leftExpandedB)}`,
    `Sederhanakan: ${(leftExpandedA - t)}x = ${u - leftExpandedB}`,
    `Bagi ${Math.abs(leftExpandedA - t)}: x = ${(u - leftExpandedB)} / ${(leftExpandedA - t)}`,
    `Hitung: x = ${(u - leftExpandedB) / (leftExpandedA - t)}`,
  ];
  return { eq, steps, solution: x, type: "p(qx + r) + s = tx + u" };
}

function genType6() {
  const m = shuffle([2, 3, 4, 5])[0];
  const a = randInt(-6, 6);
  const x = randInt(-6, 6);
  const b = x / m + a;
  const eq = `x/${m} ${withSign(a)} = ${b}`;
  const steps = [
    `Pindahkan konstanta: x/${m} = ${b} ${a >= 0 ? "-" : "+"} ${Math.abs(a)}`,
    `Sederhanakan: x/${m} = ${b - a}`,
    `Kalikan ${m} di kedua sisi: x = ${m}·${b - a}`,
    `Hitung: x = ${m * (b - a)}`,
  ];
  return { eq, steps, solution: x, type: "x/m + a = b" };
}

const BANK = [genType1, genType2, genType3, genType4, genType5, genType6];

function newProblem(level) {
  const maps = {
    dasar: [genType1, genType2, genType3],
    menengah: [genType3, genType4, genType6],
    campuran: BANK,
  };
  const pool = maps[level] ?? BANK;
  const gen = pool[randInt(0, pool.length - 1)];
  return gen();
}

export default function AlgebraPractice() {
  const [level, setLevel] = useState("dasar");
  const [prob, setProb] = useState(() => newProblem("dasar"));
  const [answer, setAnswer] = useState("");
  const [feedback, setFeedback] = useState(null);
  const [showSteps, setShowSteps] = useState(false);
  const [streak, setStreak] = useState(0);

  const correct = useMemo(() => {
    const val = Number(answer.replace(",", "."));
    if (Number.isNaN(val)) return false;
    const tol = 1e-9;
    return Math.abs(val - prob.solution) < tol;
  }, [answer, prob]);

  function check() {
    if (answer.trim() === "") {
      setFeedback({ ok: false, msg: "Isi jawaban dulu ya." });
      return;
    }
    if (correct) {
      setFeedback({ ok: true, msg: "Betul! Mantap 🎉" });
      setStreak(s => s + 1);
    } else {
      setFeedback({ ok: false, msg: "Belum tepat. Coba lagi atau lihat langkah." });
      setStreak(0);
    }
  }

  function next() {
    setProb(newProblem(level));
    setAnswer("");
    setFeedback(null);
    setShowSteps(false);
  }

  return (
    <div className="min-h-screen w-full bg-gradient-to-b from-slate-950 to-slate-900 text-slate-100 flex items-center justify-center p-6">
      <div className="w-full max-w-3xl">
        <div className="mb-6 flex items-center justify-between">
          <h1 className="text-2xl md:text-3xl font-bold tracking-tight flex items-center gap-2">
            <Sparkles className="h-6 w-6" /> Aljabar Dasar: Latihan Persamaan Linear
          </h1>
          <Badge variant="secondary" className="text-slate-900">Streak: {streak}</Badge>
        </div>

        <Card className="bg-slate-800/60 backdrop-blur border-slate-700 rounded-2xl shadow-lg">
          <CardContent className="p-6 md:p-8">
            <div className="grid md:grid-cols-3 gap-4 items-center">
              <div className="md:col-span-2">
                <p className="text-sm uppercase tracking-widest text-slate-400">Soal</p>
                <p className="text-3xl md:text-4xl font-semibold mt-1">{prob.eq}</p>
                <p className="mt-2 text-sm text-slate-400">Tipe: <span className="text-slate-200 font-medium">{prob.type}</span></p>
              </div>
              <div className="flex md:justify-end mt-2 md:mt-0">
                <div className="w-full md:w-48">
                  <p className="text-sm text-slate-400 mb-1">Level</p>
                  <Select value={level} onValueChange={(v) => { setLevel(v); next(); }}>
                    <SelectTrigger className="bg-slate-900/60 border-slate-700">
                      <SelectValue placeholder="Pilih level" />
                    </SelectTrigger>
                    <SelectContent className="bg-slate-900 border-slate-700">
                      <SelectItem value="dasar">Dasar</SelectItem>
                      <SelectItem value="menengah">Menengah</SelectItem>
                      <SelectItem value="campuran">Campuran</SelectItem>
                    </SelectContent>
                  </Select>
                </div>
              </div>
            </div>

            <div className="mt-6 grid md:grid-cols-[1fr_auto] gap-3">
              <Input
                placeholder="Jawaban x = ?"
                value={answer}
                onChange={(e) => setAnswer(e.target.value)}
                className="bg-slate-900/60 border-slate-700 text-lg"
                onKeyDown={(e) => { if (e.key === 'Enter') check(); }}
              />
              <Button onClick={check} className="gap-2">
                <Check className="h-4 w-4" /> Cek Jawaban
              </Button>
            </div>

            {feedback && (
              <div className={`mt-3 text-sm ${feedback.ok ? "text-emerald-300" : "text-rose-300"}`}>
                {feedback.msg}
              </div>
            )}

            <div className="mt-6 flex flex-wrap gap-2">
              <Button variant="secondary" onClick={() => setShowSteps(s => !s)} className="gap-2">
                {showSteps ? <EyeOff className="h-4 w-4" /> : <Eye className="h-4 w-4" />} {showSteps ? "Sembunyikan" : "Tampilkan"} Langkah
              </Button>
              <Button variant="outline" onClick={() => setFeedback({ ok: false, msg: `Jawaban sebenarnya: x = ${prob.solution}` })} className="gap-2 border-slate-600">
                <Lightbulb className="h-4 w-4" /> Tunjukkan Jawaban
              </Button>
              <Button variant="ghost" onClick={next} className="gap-2">
                <RotateCcw className="h-4 w-4" /> Soal Baru
              </Button>
            </div>

            {showSteps && (
              <div className="mt-6 p-4 rounded-xl bg-slate-900/60 border border-slate-700">
                <p className="text-sm uppercase tracking-widest text-slate-400">Langkah Penyelesaian</p>
                <ol className="list-decimal ml-5 mt-2 space-y-1">
                  {prob.steps.map((s, i) => (
                    <li key={i} className="text-slate-100">{s}</li>
                  ))}
                </ol>
              </div>
            )}

            <div className="mt-8 grid md:grid-cols-3 gap-4 text-sm text-slate-300">
              <div className="p-4 bg-slate-900/40 border border-slate-800 rounded-2xl">
                <p className="font-semibold text-slate-200 mb-1">Tips</p>
                <ul className="list-disc ml-5 space-y-1">
                  <li>Kumpulkan suku yang memuat x di satu sisi.</li>
                  <li>Pindahkan konstanta ke sisi lain.</li>
                  <li>Terakhir, bagi koefisien x.</li>
                </ul>
              </div>
              <div className="p-4 bg-slate-900/40 border border-slate-800 rounded-2xl">
                <p className="font-semibold text-slate-200 mb-1">Kontrol Level</p>
                <p>Pilih <span className="font-medium">Dasar</span> untuk soal tipe x+a=b & kx=b; <span className="font-medium">Menengah</span> menambahkan pecahan dan x di kedua sisi; <span className="font-medium">Campuran</span> semua tipe.</p>
              </div>
              <div className="p-4 bg-slate-900/40 border border-slate-800 rounded-2xl">
                <p className="font-semibold text-slate-200 mb-1">Catatan</p>
                <p>Jawab dengan angka saja. Untuk desimal boleh pakai koma atau titik.</p>
              </div>
            </div>
          </CardContent>
        </Card>
      </div>
    </div>
  );
}