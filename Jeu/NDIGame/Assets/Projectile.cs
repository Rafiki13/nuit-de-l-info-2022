using System.Collections;
using System.Collections.Generic;
using UnityEngine;

namespace NDIGame
{
    public class Projectile : MonoBehaviour
    {

        private Enemy target;

        private int damage;

        private float speed = 5f;

        public Enemy Target
        {
            get => target;
            set
            {
                if(target)
                {
                    return;
                }
                target = value;
            }
        }

        public int Damage
        {
            get => damage;
            set { damage = value; }
        }
        
        void Update()
        {
            if(!target)
            {
                Destroy(gameObject);
                return;
            }

            transform.position = Vector2.MoveTowards(transform.position, target.transform.position, speed * Time.deltaTime);

            if(Vector3.Distance(transform.position, target.transform.position) <= 0.5f)
            {
                target.Damage(damage);
                Destroy(gameObject);
            }

        }

    }

}
