using System.Collections.Generic;
using UnityEngine;
using System;

namespace NDIGame
{
    
    [System.Serializable]
    public class Wave
    {

        [SerializeField] private List<Pair<Enemy, int>> enemies;
        
        public Enemy GetRandomEnemy()
        {
            int r = UnityEngine.Random.Range(0, enemies.Count);

            var selectedType = enemies[r].First;
            enemies[r].Second = enemies[r].Second - 1;
            if(enemies[r].Second == 0)
            {
                enemies.RemoveAt(r);
            }

            return selectedType;
        }

        public int EnemiesLeft
        {
            get
            {
                int left = 0;
                foreach(Pair<Enemy, int> enemy in enemies)
                {
                    left += enemy.Second;
                }
                return left;
            }

        }

    }

}